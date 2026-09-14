# SABEM - Sistema Administrativo de Bomberos del Estado Miranda

SABEM es un sistema web desarrollado para la gestión administrativa de los Bomberos del Estado Miranda. Este sistema permite llevar el control de funcionarios, procesos de ascensos (físicos, psíquicos, aptitud/actitud), evaluaciones médicas, espíritu bomberil, entre otras funcionalidades operativas y de auditoría.

## Tecnologías Utilizadas

- **Lenguaje:** PHP (Recomendado 5.6 - 7.x)
- **Framework:** Yii Framework 1.x
- **Base de Datos:** MySQL
- **Frontend:** HTML, CSS, JavaScript, jQuery (Tema "Abound" basado en Bootstrap)
- **Librerías Extra:** mPDF para la generación de PDFs, Highcharts para gráficos estadísticos.

## Instalación y Configuración Local

Para ejecutar este proyecto en un entorno local (Mac, Linux o Windows), sigue estos pasos:

### 1. Requisitos Previos
- Servidor web (Apache, Nginx o servidor integrado de PHP).
- PHP instalado.
- Servidor de base de datos MySQL (ej. MAMP, XAMPP, Homebrew).

### 2. Configurar la Base de Datos
El proyecto espera conectarse a una base de datos local con las credenciales por defecto (usuario `root`, sin contraseña).

1. Crea una base de datos vacía llamada `bomgesh`.
2. Importa el respaldo de la estructura y los datos ubicados en la carpeta `protected/data/`:
   ```bash
   mysql -u root -e "CREATE DATABASE bomgesh;"
   mysql -u root bomgesh < protected/data/bomgesh1.7_allmodif.sql
   ```
   *(Nota: Puedes ejecutar también los archivos `alter tables.sql` incluidos en esa misma carpeta si es necesario).*

Si necesitas cambiar las credenciales de conexión (usuario/contraseña), edita el archivo:
`protected/config/main.php` en la sección de `'db'`.

### 3. Permisos de Carpetas
El framework Yii requiere permisos de escritura en algunas carpetas para generar archivos temporales (caché y logs). Ejecuta en la raíz del proyecto:

```bash
chmod -R 777 assets/
mkdir -p protected/runtime/
chmod -R 777 protected/runtime/
```

### 4. Levantar el Proyecto
La forma más sencilla de correr el proyecto es usando el servidor de desarrollo integrado de PHP. Desde la raíz del proyecto ejecuta:

```bash
php -S localhost:8000 index.php
```

Luego, abre tu navegador web e ingresa a:
👉 [http://localhost:8000](http://localhost:8000)

## Documentación y Manuales
Dentro de la aplicación (o en la carpeta `themes/abound/views/site/pdf/`) puedes encontrar documentación adicional:
- Manual de Usuario.pdf
- manual de programador.pdf
- Reglamento-2012.pdf
- intro.mp4 (Video de introducción)

---
*Proyecto finalizado e importado desde respaldo histórico.*
