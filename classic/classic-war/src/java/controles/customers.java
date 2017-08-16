/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controles;

import entidades.Customers;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import modelo.CustomersFacadeLocal;

/**
 *
 * @author MiguelAngel, Iobana Denis, Andrea 
 */
public class customers extends HttpServlet {
    @EJB
    private CustomersFacadeLocal customersFacade;
    

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    
    /**
     * @param a,b,c,d,e,f,g,h son parametros que se necesitan para el nuevo objeto de la entidad
     * @param opc, eli son las opciones que se pueden relizar
     */
    //Este metodo crea variables para cachar datos 
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String a = request.getParameter("1");
        String b = request.getParameter("2");
        String c = request.getParameter("3");
        String d = request.getParameter("4");
        String e = request.getParameter("5");
        String f = request.getParameter("6");
        String g = request.getParameter("7");
        String h = request.getParameter("8");
        String opc = request.getParameter("opcion");
        String eli = request.getParameter("eliminar");
        String hola="no";
        

        
        if(a!=null && !a.equals("")){
            int ai=Integer.parseInt(a);
            /*Se crea el nuevo objeto de la entidad Customers, necesita parametros declarados anteriormente*/
            entidades.Customers ec=new Customers(ai,b,c,d,e,f,g,h);
            /*si la opcion es editar, se instancia el metodo edit del modelo CustomersFacadeLocal.java*/
            if(opc.equals("editar")){
//                customersFacade.remove(ec); 
                customersFacade.edit(ec); 
                response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
        out.println("<script> window.location=\"index.html\"; </script>");
        }
                /*en caso contrario, se instancia el metodo create del modelo CustomersFacadeLocal.java*/             
            }else{
                customersFacade.create(ec); 
                response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
        out.println("<script> window.location=\"index.html\"; </script>");
        }
            }

        }
        
 
        
        
        
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {

            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet customers</title>");            
            out.println("          <link rel=\"stylesheet\" href=\"css/bootstrap.css\">\n" +
"          <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">\n" +
"  <script src=\"js/jquery.js\"></script>\n" +
"  <script src=\"js/angular.min.js\"></script>\n" +
"  <script src=\"js/bootstrap.js\"></script>\n" +
"  <script src=\"js/bootstrap.min.js\"></script>");
            out.println("</head>");
            out.println("<body>");
            out.println("<div class=\"col-sx-66\">");
            
            
            out.println("<h1>Customers</h1>");
//            entidades.Customers ec=new Customers(99, "hola", "adios", "1", "3", "2", "4", "4");
//            customersFacade.create(ec);

//            out.println(eli);
            out.println("<a href=\"addCustom.jsp\">Agregar</a>");
            
            out.println("<table class=\"table table-bordered table-responsive\">");
            out.println("<tr>");
            out.println("<th>customerNumber</th>");
            out.println("<th>customerName</th>");
            out.println("<th>contactLastName</th>");
            out.println("<th>contacFirstName</th>");
            out.println("<th>phone</th>");
            out.println("<th>addressLine1</th>");
            out.println("<th>addressLine2</th>");
            out.println("<th>city</th>");
            out.println("<th>state</th>");
            out.println("<th>postalCode</th>");
            out.println("<th>country</th>");
            out.println("<th>salesRepEmployeeNumber</th>");
            out.println("<th>CreditLimit</th>");
            out.println("<th>Editar</th>");
            out.println("<th>Eliminar</th>");
            out.println("</tr>");
            
/**
* Se llaman todos los registros para mostrarlos en una tabla
* @return todos los datos que son almacenados en la BD
*/            
            List<entidades.Customers> c1= customersFacade.findAll();
            for (int i = 0; i < c1.size(); i++) {
                
            
                out.println("<tr>");    
                out.println("<td>");    
                out.println(c1.get(i).getCustomerNumber());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getCustomerName());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getContactLastName());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getContactFirstName());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getPhone());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getAddressLine1());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getAddressLine2());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getCity());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getState());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getPostalCode());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getCountry());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getSalesRepEmployeeNumber());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getCreditLimit());
                out.println("</td>");
                
                out.println("<td>");  
                
                out.println("<form action=\"addCustom.jsp\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getCustomerNumber()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getCustomerName()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getContactLastName()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getContactFirstName()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getPhone()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getAddressLine1()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getCity()+"\" />\n" +
"<input type=\"hidden\" name=\"h\" value=\""+c1.get(i).getCountry()+"\" />\n" +
"<input type=\"hidden\" name=\"i\" value=\"editar\" />\n" +
"<button class=\"btn btn-primary\" type=\"submit\" value=\"Editar\" /></button>\n" +
"</form>");    
out.println("</td>");out.println("<td>");
                out.println("<form action=\"deleteCustom\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getCustomerNumber()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getCustomerName()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getContactLastName()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getContactFirstName()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getPhone()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getAddressLine1()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getCity()+"\" />\n" +
"<input type=\"hidden\" name=\"h\" value=\""+c1.get(i).getCountry()+"\" />\n" +
"<input type=\"hidden\" name=\"i\" value=\"editar\" />\n" +
"<button class=\"btn btn-danger\" type=\"submit\" value=\"Eliminar\" /></button>\n" +
"</form>"); 
                out.println("</td>");
                out.println("</tr>");

            }
            
            out.println("</table>");
            
            out.println("</div>");

            out.println("</body>");
            out.println("</html>");
        } 
        
        
    }    


    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
