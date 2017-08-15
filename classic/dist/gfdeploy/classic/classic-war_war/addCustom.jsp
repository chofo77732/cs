<%-- 
    Document   : addCustom
    Created on : 9/08/2017, 12:53:19 AM
    Author     : MiguelAngel
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
        
          <% String a = request.getParameter("a"); %>
    <% String b = request.getParameter("b"); %>
    <% String c = request.getParameter("c"); %>
    <% String d = request.getParameter("d"); %>
    <% String e = request.getParameter("e"); %>
    <% String f = request.getParameter("f"); %>
    <% String g = request.getParameter("g"); %>
    <% String h = request.getParameter("h"); %>
    <% String i = request.getParameter("i"); %>

        <h2>Agregar Cliente</h2>
        
          <form action="customers" method="post">
              
 

              
    <table style="border: 1px solid black" class="table table-bordered table-responsive">
      
      <tr>
        <td>customerNumber</td>
      
        <td><input type="text" name="1" value=<%= a %>></td>
      </tr>
      <tr>
        <td>customerName</td>
        <td><input type="text" name="2" value=<%= b %>></td>
      </tr>
            <tr>
        <td>contactLastName</td>
        <td><input type="text" name="3" value=<%= c %>></td>
      </tr>
            <tr>
        <td>contactFirstName</td>
        <td><input type="text" name="4" value=<%= d %>></td>
      </tr>
            <tr>
        <td>phone</td>
        <td><input type="text" name="5" value=<%= e %>></td>
      </tr>
            <tr>
        <td>addressLine1</td>
        <td><input type="text" name="6" value=<%= f %>></td>
      </tr>
            <tr>
        <td>city</td>
        <td><input type="text" name="7" value=<%= g %>></td>
      </tr>
            <tr>
        <td>country</td>
        <td><input type="text" name="8" value=<%= h %>></td>
      </tr>
    </table>
    
<input type="hidden" name="opcion" value=<%= i %> />
<input type="submit" value="Guardar"/>

    </form>

  
        <a href="index.html">volver</a>
    </body>
</html>
