/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controles;

import entidades.Productlines;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import modelo.ProductlinesFacadeLocal;

/**
 *
 * @author MiguelAngel
 */
public class pl extends HttpServlet {
    @EJB
    private ProductlinesFacadeLocal productlinesFacade;

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
                        String a = request.getParameter("1");

        String opc = request.getParameter("opcion");
        String eli = request.getParameter("eliminar");
        String hola="no";
        

        
        if(a!=null && !a.equals("")){
            

            
            entidades.Productlines p1=new Productlines(a);
        
            if(opc.equals("editar")){
//                customersFacade.remove(ec); 
                productlinesFacade.edit(p1);
                response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
        out.println("<script> window.location=\"index.html\"; </script>");
        }
            }else{
               productlinesFacade.create(p1);
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
            
            
            out.println("<h1>ProductLine</h1>");
//            entidades.Customers ec=new Customers(99, "hola", "adios", "1", "3", "2", "4", "4");
//            customersFacade.create(ec);

//            out.println(eli);
            out.println("<a href=\"addpl.jsp\">Agregar</a>");

            out.println("<table class=\"table table-bordered table-responsive\">");
            out.println("<tr>");
            out.println("<th>ProductLine</th>");
            out.println("<th>textDescription</th>");
            out.println("<th>HTMLDescription</th>");
            out.println("<th>Image</th>");
            out.println("<th>Editar</th>");
            out.println("<th>Eliminar</th>");
            out.println("</tr>");
            
            
            List<entidades.Productlines> c1= productlinesFacade.findAll();
            for (int i = 0; i < c1.size(); i++) {
                
            
                out.println("<tr>");    
                out.println("<td>");    
                out.println(c1.get(i).getProductLine());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getTextDescription());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getHtmlDescription());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getImage());
                out.println("</td>");
                
                out.println("<td>");
                out.println("<form action=\"addpl.jsp\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getProductLine()+"\" />\n" +
"<input type=\"hidden\" name=\"edi\" value=\"editar\" />\n" +
"<button class=\"btn btn-primary\" type=\"submit\" value=\"Editar\" /></button>\n" +
"</form>");
                out.println("</td>");
                
                out.println("<td>");
                out.println("<form action=\"deletepl\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getProductLine()+"\" />\n" +
"<input type=\"hidden\" name=\"edi\" value=\"editar\" />\n" +
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
