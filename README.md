(3H) 👨‍🚀Campers vs 🌵Plantas - Gestión de Jardín 🌻 y Registro de Riego 📈

Este examen tiene como propósito desarrollar una API RESTful en PHP que permita gestionar las plantas de un jardín personal. Cada planta debe tener un nombre, categoría y familia. Dependiendo de la categoría, el sistema debe calcular cuándo debe regarse. También se debe permitir registrar cada evento de riego y actualizar la fecha del próximo. El sistema debe incluir endpoints para visualizar la lista de próximas plantas por regar, filtrar por categoría y ver el detalle de una planta incluyendo su historial de riego.
V
Resultado esperado

Contexto y Especificaciones:



El examen consiste en implementar un sistema básico de gestión de un jardín mediante una API RESTful. El sistema debe permitir:

Registrar plantas con: nombre, categoría (ej: cactus, ornamental, frutal), familia.
				Listado de Plantas

				+----+-----------------------------+-------------------+-------------------+

				| # | Nombre común             | Familia            | Categoría       |

				+----+-----------------------------+----------------------+----------------+

				| 1   | Aloe Vera                    | Asphodelaceae  | cactus.        |

				| 2   | Lavanda                      | Lamiaceae         | ornamental |

				| 3   | Fresa.                          | Rosaceae          | frutal           |

				| 4   | Lengua de suegra       | Asparagaceae   | ornamental |

				| 5   | Nopal                           | Cactaceae         | cactus        |

				| 6   | Tomatera.                    | Solanaceae        | frutal          |

				| 7   | Orquídea                     | Orchidaceae       | ornamental |

				| 8   | Higuera                        | Moraceae           | frutal          |

				| 9   | Sansevieria                  | Asparagaceae    | ornamental |

				| 10  | Pitahaya                      | Cactaceae         | cactus        |

				+-----+-----------------------------+------------------------+--------------+

Calcular automáticamente la fecha del próximo riego según la categoría
			Categorías y Frecuencias Predeterminadas

			+-------------+----------------------------+---------------------------------------+

			| Categoría | Frecuencia de riego (días)| Ejemplo de familias       |

			+---------------+----------------------------+--------------------------------------+

			| cactus         | 10 días                    | Cactaceae, Asphodelaceae   |

			| ornamental | 3 días                      | Lamiaceae, Araceae             |

			| frutal           | 5 días                      | Rosaceae, Solanaceae         |

			+---------------+----------------------------+-------------------------------------+

Registrar eventos de riego y actualizar la fecha próxima de riego.
Consultar:
Las próximas plantas a regar.
Plantas por categoría.
Detalle de una planta con historial de riego.


Requisitos funcionales:



POST /plantas: registrar planta (nombre, categoría, familia).
Request JSON:
{
  "nombre": "Aloe Vera",
  "categoria": "cactus",
  "familia": "Asphodelaceae"
}

Response JSON:
{
  "id": 1,
  "nombre": "Aloe Vera",
  "categoria": "cactus",
  "familia": "Asphodelaceae",
  "proximo_riego": "2025-08-14"
}
GET /plantas: listar todas las plantas.
Response JSON:
[
  {
    "id": 1,
    "nombre": "Aloe Vera",
    "categoria": "cactus",
    "familia": "Asphodelaceae",
    "proximo_riego": "2025-08-14"
  },
  {
    "id": 2,
    "nombre": "Lavanda",
    "categoria": "ornamental",
    "familia": "Lamiaceae",
    "proximo_riego": "2025-08-07"
  }
]


GET /plantas/categoria/{categoria}: listar plantas por categoría.
Response JSON - ej /plantas/categoria/cactus:
[
  {
    "id": 1,
    "nombre": "Aloe Vera",
    "categoria": "cactus",
    "familia": "Asphodelaceae",
    "proximo_riego": "2025-08-14"
  }
]

POST /riego/{id_planta}: registrar evento de riego (y actualizar fecha próxima).
Request JSON:
{
  "fecha_riego": "2025-08-04"
}
Response JSON:
{
  "mensaje": "Riego registrado correctamente",
  "id_planta": 1,
  "proximo_riego_actualizado": "2025-08-14"
}
GET /riego/proximos: listar las plantas próximas a regar ordenadas por fecha.
Response JSON:
[
  {
    "id": 2,
    "nombre": "Lavanda",
    "categoria": "ornamental",
    "familia": "Lamiaceae",
    "proximo_riego": "2025-08-07"
  },
  {
    "id": 3,
    "nombre": "Tomatera",
    "categoria": "frutal",
    "familia": "Solanaceae",
    "proximo_riego": "2025-08-09"
  }
]
GET /planta/{id}: mostrar el detalle de una planta + historial de riego.
Response JSON - ej /planta/1:
{
  "id": 1,
  "nombre": "Aloe Vera",
  "categoria": "cactus",
  "familia": "Asphodelaceae",
  "proximo_riego": "2025-08-14",
  "historial_riego": [
    {
      "fecha": "2025-07-25"
    },
    {
      "fecha": "2025-08-04"
    }
  ]
}
Formato para errores comunes:
Error 400 – Datos inválidos
{
  "error": "Datos inválidos",
  "detalles": {
    "nombre": "Este campo es obligatorio",
    "categoria": "Valor no permitido. Opciones válidas: cactus, ornamental, frutal"
  }
}
Error 404 – Planta no encontrada
{
  "error": "Recurso no encontrado",
  "mensaje": "No se encontró una planta con el ID proporcionado"
}
Error 500 – Error interno del servidor
{
  "error": "Error interno",
  "mensaje": "Ha ocurrido un error inesperado en el servidor"
}
Requisitos no funcionales:



Conexión a base de datos usando PDO y sentencias preparadas.
Arquitectura orientada a objetos con clases, encapsulamiento, herencia y polimorfismo.
Uso de Composer con autoloading PSR-4.
Aplicación de principios SOLID y patrones de diseño (como DAO, Repository o Strategy para cálculo de riego).
Estructura organizada en controladores, servicios, modelos y rutas.
Slim Framework con middlewares y manejo de errores.