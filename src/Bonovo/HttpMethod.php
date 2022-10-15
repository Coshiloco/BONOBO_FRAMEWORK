<?php



// Para la importacion ponemos el namespace que hemos creado
namespace Bonovo;


enum HttpMethod: string {
  case GET = "GET";
  case POST = "POST";
  case PUT = "PUT";
  case PATCH = "PATCH";
  case DELETE = "DELETE";
}