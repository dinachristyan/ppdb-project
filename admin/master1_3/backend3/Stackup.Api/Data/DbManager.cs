using System.Data;
using MySql.Data.MySqlClient;

public class DbManager
{
    private readonly string _connectionString;

    private readonly MySqlConnection _connection;

    public DbManager(IConfiguration configuration)
    {
        _connectionString = configuration.GetConnectionString("DefaultConnection");
        _connection = new MySqlConnection(_connectionString);
    }



    public List<Sekolah> GetAllSekolahs()
    {
        List<Sekolah> sekolahList = new List<Sekolah>();
        try
        {
            using(MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "SELECT * FROM sekolah";
                MySqlCommand command = new MySqlCommand(query, connection);
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        Sekolah sekolah = new Sekolah
                        {
                            id = Convert.ToInt32(reader["Id"]),
                            nama = reader["Nama"].ToString(),
                            alamat = reader["Alamat"].ToString()
                        };

                        sekolahList.Add(sekolah);
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return sekolahList;
    }


    public Sekolah GetSekolahById(int id)
    {
        Sekolah sekolah = null;
        try
        {
            using (MySqlConnection connection = new MySqlConnection(_connectionString))
            {
                string query = "SELECT * FROM sekolah WHERE id = @Id";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Id", id);

                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        sekolah = new Sekolah
                        {
                            id = Convert.ToInt32(reader["Id"]),
                            nama = reader["Nama"].ToString(),
                            alamat = reader["Alamat"].ToString()
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return sekolah;
    }

    //CREATE Sekolah
    public int CreateSekolah(Sekolah sekolah)
    {
        using (MySqlConnection connection = new MySqlConnection(_connectionString))
        {
            string query = "INSERT INTO sekolah (id, nama, alamat) VALUES (@Id, @Nama, @Alamat)";
            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@Id", sekolah.id);
                command.Parameters.AddWithValue("@Nama", sekolah.nama);
                command.Parameters.AddWithValue("@Alamat", sekolah.alamat);

                connection.Open();
                return command.ExecuteNonQuery();
            }
        }
    }

    //UPDATE Sekolah
    public int UpdateSekolah(int id, Sekolah sekolah)
    {
        using (MySqlConnection connection = new MySqlConnection(_connectionString))
        {
            string query = "UPDATE sekolah SET nama = @Nama, alamat = @Alamat WHERE id = @Id";
            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@Id", sekolah.id);
                command.Parameters.AddWithValue("@Nama", sekolah.nama);
                command.Parameters.AddWithValue("@Alamat", sekolah.alamat);

                connection.Open();
                return command.ExecuteNonQuery();
            }
        }
    }


    //DELETE Srkolah
    public int DeleteSekolah(int id)
    {
        using (MySqlConnection connection = new MySqlConnection(_connectionString))
        {
            string query = "DELETE FROM sekolah WHERE id = @Id";
            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@Id", id);

                connection.Open();
                return command.ExecuteNonQuery();
            }
        }
    }


}