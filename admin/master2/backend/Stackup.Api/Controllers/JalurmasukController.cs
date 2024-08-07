using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]
public class JalurmasukController : ControllerBase
{
    private readonly DbManager _dbManager;
    Response response = new Response();

    public JalurmasukController(IConfiguration configuration)
    {
        _dbManager = new DbManager(configuration);
    }


    [HttpGet]
    public IActionResult GetJalurmasuk()
    {
        try
        {
            var jalurmasukList = _dbManager.GetAllJalurmasuks(); 
            response.status = 200;
            response.message = "Success";
            response.data = jalurmasukList;
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
    public IActionResult CreateJalurmasuk([FromBody] Jalurmasuk jalurmasuk)
    {
        try
        {
            _dbManager.CreateJalurmasuk(jalurmasuk); 
            response.status = 200;
            response.message = "Success";
            response.data = jalurmasuk;
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
    [Route("UpdateJalurmasuk")]
    public IActionResult UpdateJalurmasuk(int id, [FromBody] Jalurmasuk jalurmasuk)
    {
        try
        {
            _dbManager.UpdateJalurmasuk(id, jalurmasuk); 
            response.status = 200;
            response.message = "Success";
            response.data = jalurmasuk;
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
    public IActionResult DeleteJalurmasuk(int id)
    {
        try
        {
            _dbManager.DeleteJalurmasuk(id); 
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