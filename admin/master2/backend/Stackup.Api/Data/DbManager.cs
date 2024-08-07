using System;
using System.Collections.Generic;
using MySql.Data.MySqlClient;
using Microsoft.Extensions.Configuration;

public class DbManager
{
    private readonly string _connectionString;

    public DbManager(IConfiguration configuration)
    {
        _connectionString = configuration.GetConnectionString("DefaultConnection");
    }

    // Retrieve all Jalurmasuk
    public List<Jalurmasuk> GetAllJalurmasuks()
    {
        List<Jalurmasuk> jalurmasukList = new List<Jalurmasuk>();
        try
        {
            using (MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "SELECT * FROM jalur_masuk";
                MySqlCommand command = new MySqlCommand(query, connection);
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        Jalurmasuk jalurmasuk = new Jalurmasuk
                        {
                            id = Convert.ToInt32(reader["id"]),
                            nama_jalur = reader["nama_jalur"].ToString()
                        };
                        jalurmasukList.Add(jalurmasuk);
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return jalurmasukList;
    }

    // Create Jalurmasuk
    public int CreateJalurmasuk(Jalurmasuk jalurmasuk)
    {
        try
        {
            using (MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "INSERT INTO jalur_masuk (id, nama_jalur) VALUES (@Id, @Nama_jalur)";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id", jalurmasuk.id);
                    command.Parameters.AddWithValue("@Nama_jalur", jalurmasuk.nama_jalur);
                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
            return 0;
        }
    }

    // Update Jalurmasuk
    public int UpdateJalurmasuk(int id_jalurmasuk, Jalurmasuk jalurmasuk)
    {
        try
        {
            using (MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "UPDATE jalur_masuk SET nama_jalur = @Nama_jalur WHERE id = @Id";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id", id_jalurmasuk);
                    command.Parameters.AddWithValue("@Nama_jalur", jalurmasuk.nama_jalur);
                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
            return 0;
        }
    }

    // Delete Jalurmasuk
    public int DeleteJalurmasuk(int id)
    {
        try
        {
            using (MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "DELETE FROM jalur_masuk WHERE id = @Id";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id", id);
                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
            return 0;
        }
    }
}
