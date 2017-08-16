<%-- 
    Document   : addProduct
    Created on : 9/08/2017, 09:00:00 PM
    Author     : MiguelAngel,Andrea,Iobana
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
                  <link rel="stylesheet" href="css/bootstrap.css">
          <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        
        /**
     * @param a,b,c,d,e,f,g,h son parametros que se necesitan para el nuevo objeto de la entidad    
     */
        
          <% String a = request.getParameter("a"); %>
    <% String b = request.getParameter("b"); %>
    <% String c = request.getParameter("c"); %>
    <% String d = request.getParameter("d"); %>
    <% String e = request.getParameter("e"); %>
    <% String f = request.getParameter("f"); %>
    <% String g = request.getParameter("g"); %>
    <% String h = request.getParameter("h"); %>
    <% String edi = request.getParameter("edi"); %>
    <% String j = request.getParameter("j"); %>

        <h2>Agregar Producto</h2>
        
          <form action="product" method="post">
              
 
            
  /**
     * Creacion de tabla con parametros a,b,c,d,e,f,g,h del nuevo objeto de la entidad    
     */

              
    <table style="border: 1px solid black" class="table table-bordered table-responsive">
      
      <tr>
        <td>ProductCode</td>
      
        <td><input type="text" name="1" value=<%= a %>></td>// En en apartado values se invoca el parametro del  objeto.
      </tr>
      <tr>
        <td>ProductName</td>
        <td><input type="text" name="2" value=<%= b %>></td>
      </tr>
            <tr>
        <td>ProductLine</td>
        <td><input type="text" name="3" value=<%= c %>></td>
      </tr>
            <tr>
        <td>ProductScale</td>
        <td><input type="text" name="4" value=<%= d %>></td>
      </tr>
            <tr>
        <td>ProductVendor</td>
        <td><input type="text" name="5" value=<%= e %>></td>
      </tr>
            <tr>
        <td>ProductDescription</td>
        <td><input type="text" name="6" value=<%= f %>></td>
      </tr>
            <tr>
        <td>quantityInStock</td>
        <td><input type="text" name="7" value=<%= g %>></td>
      </tr>
            <tr>
        <td>buyPrice</td>
        <td><input type="text" name="8" value=<%= h %>></td>
      </tr>
            <tr>
        <td>MSRP</td>
        <td><input type="text" name="9" value=<%= j %>></td>
      </tr>
    </table>
    
<input type="hidden" name="opcion" value=<%= edi %> />
<input type="submit" value="Guardar"/>

    </form>


        <a href="index.html">volver</a>
    </body>
</html>
