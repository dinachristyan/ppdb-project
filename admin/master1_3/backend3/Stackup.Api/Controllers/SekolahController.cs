using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]
public class SekolahController : ControllerBase
{
    private readonly DbManager _dbManager;
    Response response = new Response();

    public SekolahController(IConfiguration configuration)
    {
        _dbManager = new DbManager(configuration);
    }


    [HttpGet]
    public IActionResult GetSekolah()
    {
        try
        {
            var sekolahList = _dbManager.GetAllSekolahs(); 
            response.status = 200;
            response.message = "Success";
            response.data = sekolahList;
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
            response.data = null;
        }
        return Ok(response);
    }

    [HttpGet("{id}")]
    public IActionResult GetSekolahById(int id)
    {
        try
        {
            var sekolah = _dbManager.GetSekolahById(id);
            if (sekolah == null)
            {
                response.status = 404;
                response.message = "Sekolah not found";
                response.data = null;
                return NotFound(response);
            }

            response.status = 200;
            response.message = "Success";
            response.data = sekolah;
        }
        
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
            response.data = null;
        }
        return Ok(response);
    }




    [HttpPost]
    public IActionResult CreateSekolah([FromBody] Sekolah sekolah)
    {
        try
        {
            _dbManager.CreateSekolah(sekolah); 
            response.status = 200;
            response.message = "Success";
            response.data = sekolah;
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
            response.data = null;
        }
        return Ok(response);
    }

    [HttpPut]
    [Route("UpdateSekolah")]
    public IActionResult UpdateSekolah(int id, [FromBody] Sekolah sekolah)
    {
        try
        {
            _dbManager.UpdateSekolah(id, sekolah); 
            response.status = 200;
            response.message = "Success";
            response.data = sekolah;
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
            response.data = null;
        }
        return Ok(response);
    }

    [HttpDelete("{id}")]
    public IActionResult DeleteSekolah(int id)
    {
        try
        {
            _dbManager.DeleteSekolah(id); 
            response.status = 200;
            response.message = "Success";
            response.data = null;
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
            response.data = null;
        }
        return Ok(response);
    }





}