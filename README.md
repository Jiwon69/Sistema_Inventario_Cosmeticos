# 💄 Sistema de Gestión de Inventario de Productos de Belleza

Sistema web desarrollado en **PHP** con **Visual Studio** y **SQL** como base de datos.  
Esta aplicación está diseñada para **gestionar productos de belleza y salud**, controlando entradas y salidas de almacén, el stock actual y devoluciones de productos.

---

## 🚀 Funcionalidades principales

### 🔐 Autenticación y seguridad
- Inicio de sesión con usuario y contraseña  
- Roles diferenciados: **Admin** y **Almacenero**  
- Control de permisos según perfil  

### 📦 Gestión de productos
- Registro de productos de belleza y salud  
- Control de stock por producto  
- Registro de entradas y salidas de almacén  
- Gestión de devoluciones y productos dañados  
- Visualización del stock actual por producto  

### 🛡 Gestión de roles

#### 👨‍💼 Admin
- Agregar, editar y eliminar productos  
- Administrar usuarios  
- Consultar historial completo de entradas, salidas y devoluciones  

#### 🧑‍🔧 Almacenero
- Registrar entradas y salidas de productos  
- Actualizar el stock en tiempo real  
- Gestionar devoluciones y productos devueltos  

---

## 🏗 Arquitectura del proyecto

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP (Visual Studio)  
- **Base de datos:** SQL Server o MySQL  
- Patrón de desarrollo: Estructura organizada por módulos (Usuarios, Productos, Movimientos, Stock)  

---

## 🗄 Base de datos

Tablas principales:

- `usuarios` → nombre, correo, contraseña, rol  
- `productos` → nombre, categoría, precio, stock  
- `movimientos` → tipo (entrada/salida/devolución), fecha, cantidad, producto  
- `roles` → admin, almacenero  

Incluye scripts SQL para creación de tablas y relaciones.

<img width="1809" height="2102" alt="Diagrama" src="https://github.com/user-attachments/assets/d7cc63dd-82a2-4b97-92c5-bdcaed466ebb" />


---

## 🛠 Tecnologías utilizadas

- PHP  
- SQL (MySQL o SQL Server)  
- HTML5  
- CSS3  
- JavaScript  
- Visual Studio  
- Git & GitHub  

---

git clone https://github.com/TU-USUARIO/sistema-inventario.git
