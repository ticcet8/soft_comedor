# soft_comedor
Proyecto Software Comedor 
Responsables del Proyecto 
Ref TIC Mónica Pérez 
Ref TIC Alam Ravbar

_Introducción_

El presente proyecto se crea para realizar un  sistema que dé respuesta a la necesidad de las cocineras del establecimiento de llevar un control de la cantidad  de comida que deben realizar diariamente en el comedor escolar. 

El comedor del CET 8 cuenta con un sistema de inscripción al comedor, el cuál provee a las cocineras una lista de estudiantes quienes asistirán ese día al comedor. Esta lista es registrada en un cuaderno y solo puede ser llenada en el momento de ingreso a la escuela o en el recreo de 10 minutos. Esto provoca que varios estudiantes no puedan anotarse al comedor o también que las cocineras no puedan saber en tiempo real cuántos platos deben realizar aproximadamente. A esto se suma que los estudiantes desconocen el plato de comida hasta ingresar a comer y que las cocineras no tienen una devolución en base a la comida propuesta. Esto último podría omitirse. 

La solución encontrada para dicho problema es la creación de una página web, almacenada de forma local, para gestionar las inscripciones de los estudiantes y permitir la visualización de la comida disponible. 

_Objetivos del proyecto_

Facilitar la inscripción de los estudiantes: Permitir que los estudiantes se inscriban en el comedor escolar de manera rápida y sencilla, utilizando una plataforma en línea accesible desde cualquier dispositivo.
Mejorar la eficiencia en la preparación de alimentos: Proporcionar a las cocineras información precisa sobre la cantidad de estudiantes que asistirán al comedor, lo que les permitirá planificar y preparar la cantidad adecuada de comida, evitando desperdicios o escasez de alimentos.
Brindar acceso al menú antes de la inscripción: Permitir que los estudiantes puedan ver el menú del día o de la semana con antelación, lo que les ayudará a tomar decisiones informadas sobre si desean inscribirse o no, considerando sus preferencias y necesidades dietéticas.
Fomentar la comunicación y la retroalimentación: Permitir que los estudiantes dejen comentarios y sugerencias sobre la comida ofrecida en el comedor, lo que permitirá a las cocineras conocer las opiniones de los estudiantes y realizar mejoras en base a sus preferencias y necesidades.
Agilizar la gestión de registros: Simplificar el proceso de registro y llevar un seguimiento electrónico de las inscripciones, lo que reducirá la carga de trabajo administrativo para las cocineras y facilitará la organización de los datos.
Acceso desde múltiples dispositivos: Garantizar que tanto las cocineras como los estudiantes puedan acceder a la plataforma desde cualquier dispositivo, ya sea una computadora de escritorio, una laptop, una tableta o un teléfono móvil.
Mejorar la experiencia del usuario: Diseñar una interfaz amigable e intuitiva para la plataforma web, de manera que sea fácil de usar tanto para las cocineras como para los estudiantes, promoviendo una experiencia positiva y satisfactoria

_Alcance del proyecto_

El proyecto será realizado por los referentes escolares TIC del establecimiento y tiene como alcance a todos los estudiantes que participen del comedor en sus respectivos turnos y a las cocineras quienes gestionarán junto a los preceptores, la página web dedicada al comedor. 
Describe los límites y alcances del proyecto, como el desarrollo de la pá

Metodología:
Para abordar el proyecto utilizaremos SCRUM en el desarrollo de cada etapa, de la plataforma, en el tiempo. Las etapas que trabajaremos son  el análisis de requisitos, el diseño de la página web, la implementación y las pruebas.

_Requerimientos del sistema:_

El sistema tendrá requerimiento de sistema como de hardware para su implementación. 

_Requerimientos de hardware y servicios:_ 
El sistema debe prever un acceso a una página web la cual dará registro de todas los ingresos al comedor. Este debe poseer un servidor apache y mongodb para la implementación de la página. También debe poseer dos placas de red, una para subir la página a Internet y otra para acceder a una red local. 
La cantidad de conexiones o peticiones a la misma es relativamente baja ya que no son muchos los estudiantes que se anota diariamente al comedor. 

_Requerimientos del sistema:_ 
La aplicación a desarrollar deberá: 
Registrar a los estudiantes (Ver si lo hace el estudiante o lo realiza directamente el preceptor a cargo o un admin).
Registrar los comensales por día en el comedor. 
Registrar las comidas de cada día (poder hacer diariamente como semanalmente o mensualmente) 
Contar la cantidad de estudiantes que comerán en tal horario en el comedor y proveer a las cocineras un listado de quién comerá en el mismo.
El sistema debe estar online como local
Para el ingreso deberá contar con un sistema de QR el cual permitirá acceder de forma local como online. 
Dejar comentarios por cada comida por los estudiantes (puede haber también una valoración)


_Base de datos propuesta:_ 
Usuario: 
id
nombre_usuario
contrasena
rol: estudiante, admin, cocinera

Estudiante extend Usuario
nombre 
apellido
dni 
curso: id_curso
alergias: string
dias_acomer:{
 lunes: turno_horario o 0
 martes: turno_horario o 0
 miercoles:  turno_horario o 0
 jueves:  turno_horario o 0
 viernes:  turno_horario o 0
}
Habilitado: 1 o 0
comidas: [id_comida, id_comida…]

Curso: 
id
nombre

Comida
id_comida
nombre

Diario
fecha: 
comida: id_comida
comensales:[
  id_estudiante: ,
  horario: 
  comio: 1 o 0
]
comentarios: [{id_usuario: …. , comentario:___}]

Configuracion
horario_cierre: hora
cambiar_contrasena: ToF
modificar_datos: ToF
comentarios: ToF



Implementación:

Para el desarrollo del sistema lo dividiremos en 7 etapas: 
 1) diseño de la base de datos
 2) diseño de la interfaz gráfica
 3) implementación de la interfaz gráfica
 4) implementación de la base de datos
 5) desarrollo del backend
 6) pruebas y testeos
 7) puesta en marcha


Explica cómo planeas llevar a cabo la implementación de la página web.
Si es relevante, menciona los recursos y tecnologías que utilizarás para desarrollar la página web.
Pruebas y evaluación:

Describe cómo realizarás pruebas para asegurarte de que la página web funcione correctamente y cumpla con los requisitos establecidos.
Considera la posibilidad de realizar pruebas piloto con un grupo de estudiantes y recopilar su retroalimentación.
Cronograma:

Presenta un cronograma detallado con las actividades y fechas correspondientes para cada etapa del proyecto.
Conclusiones:

Resume los beneficios esperados de la implementación de la página web.
Destaca cómo este proyecto mejorará la eficiencia y la experiencia de los estudiantes y las cocineras en la escuela.


