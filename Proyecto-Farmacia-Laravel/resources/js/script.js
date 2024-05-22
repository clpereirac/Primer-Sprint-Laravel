function cargarContenido(abrir) {
    var contenedor = document.getElementById("menu");
    fetch(abrir)
      .then((response) => response.text())
      .then((data) => (contenedor.innerHTML = data));
  }
  
  //? Funcion para buscar producto
  function buscar(){
    
    var elemento_buscar = document.getElementById("nombre_producto").value;
    cargarContenido("./model/productos.php?buscar=" + elemento_buscar);
  
  }
  
  // opcion al seleccionar el producto 
  function options(){
      var productos = document.getElementById('productos');
  
      productos.innerHTML = '';
      var select = document.createElement('select');
      select.name = 'producto';
      select.id = 'producto';
      select.innerHTML = `
        <option value="1">Seleccion de opciones</option>
        <option value="2">Lista de productos</option>
        <option value="3">Agregar productos</option>`;
      productos.appendChild(select);
  
      select.onchange = function(){
        cargarLista();
      }
  }
  
  function cargarLista(){
    var tipo_select = document.getElementById("producto").value;
  
    if(tipo_select == 2){
      cargarContenido("./model/productos.php");
    }else{
        cargarContenido("./model/form-agregar_producto.php");
    }
  }
  
  
  
  //? funcion para registrar productos 
  function registrarProductos() {
    var contenedor = document.getElementById("menu");
    var formulario = document.getElementById("form-registro");
    var parametros = new FormData(formulario);
  
    fetch("./model/create.php", { method: "POST", body: parametros })
      .then((response) => response.text())
      .then((data) => (contenedor.innerHTML = data));
  
    setTimeout(() => {
      cargarContenido("./model/productos.php");
    }, 1000);
  }
  
  
  // funcion para editar un porducto 
  function update(id) {
    cargarContenido("./model/form-update-prod.php?id=" + id);
  }
  
  function actualizarProducto() {
    var contenedor = document.getElementById("menu");
    var formulario = document.getElementById("form-update");
    var parametros = new FormData(formulario);
  
    fetch("./model/update.php", { method: "POST", body: parametros })
      .then((response) => response.text())
      .then((data) => {
        contenedor.innerHTML = data;
  
        setTimeout(() =>{
          cargarContenido("./model/productos.php");
        }, 1000);
  
      });
      
  }
  
  
  function deleteProducto(id){
  
    cargarContenido("./model/delete.php?id=" + id);
  
    setTimeout(() =>{
      cargarContenido("./model/productos.php");
    }, 500);
  }
  
  
  
  // Funcion para mostrar la informacion de los medicamentos
  function mostrarMedicamentos(){
    cargarContenido("./model/informacion_productos.php");
  }
  
  
  
  
  function busqueda(){
    
    var elemento_buscar = document.getElementById("nombreProducto").value;
    cargarContenido("./model/informacion_productos.php?buscar=" + elemento_buscar);
  
  }
  
  
  
  function desechar(id){
  
    cargarContenido("./model/delete.php?id=" + id);
  
    setTimeout(() =>{
      cargarContenido("./model/lotes_productos.php");
    }, 500);
  }
  
  
  
  
  
  
  //? PARTE DONDE SE REGISTRA LOS DATOS DEL CLIENTE
  function registrarCliente() {
    var contenedor = document.getElementById("menu");
    var formulario = document.getElementById("form-cliente");
    var parametros = new FormData(formulario);
  
    fetch("./model/registro_cliente.php", { method: "POST", body: parametros })
      .then((response) => response.text())
      .then((data) => (contenedor.innerHTML = data));
  
    setTimeout(() => {
      cargarContenido("./model/form-procesar-venta.php");
    }, 1000);
  }
  
  
  
  
  
  
  
  //todo: PARTE DE PROCESAR UN VENTA 
  function procesarVenta(){
  
    var contenedor = document.getElementById("menu");
    var formulario = document.getElementById("form-venta");
    var datos = new FormData(formulario);
  
    fetch("./model/procesar-venta.php", { method: "POST", body: datos })
      .then((response) => response.text())
      .then((data) => (contenedor.innerHTML = data));
  
    setTimeout(() => {
      cargarContenido("./model/factura-venta.php");
    }, 1000);
  }
  
  
  
  function cerrarSesion() {
    window.location.href = '../cerrar_sesion.php';
  }
  
  
  
  
  function buscarFactura(){
    
    var elemento_buscar = document.getElementById("id_factura").value;
  
    cargarContenido("./model/factura-venta.php?buscar=" + parseInt(elemento_buscar));
  
  }
  
  