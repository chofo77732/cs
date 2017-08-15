/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controles;

import entidades.Orders;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;
import java.util.List;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import modelo.OrdersFacadeLocal;

/**
 *
 * @author MiguelAngel
 */
public class orders extends HttpServlet {
    @EJB
    private OrdersFacadeLocal ordersFacade;

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
        String b = request.getParameter("2");
        String c = request.getParameter("3");
        String d = request.getParameter("4");
        String e = request.getParameter("5");
        String f = request.getParameter("6");
        String g = request.getParameter("7");
        String opc = request.getParameter("opcion");
        String eli = request.getParameter("eliminar");
        String hola="no";
        
Date date = new Date();
        
        if(a!=null && !a.equals("")){
            
            int ai=Integer.parseInt(a);
           int a2=Integer.parseInt(g); 
           
            entidades.Orders p1=new Orders(ai, date, date, e, a2);
        
            if(opc.equals("editar")){
//                customersFacade.remove(ec); 
                ordersFacade.edit(p1);
                                response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
        out.println("<script> window.location=\"index.html\"; </script>");
        }
            }else{
               ordersFacade.create(p1);
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
            
            
            out.println("<h1>Orders</h1>");

            out.println("<a href=\"addOrder.jsp\">Agregar</a>");

            out.println("<table class=\"table table-bordered table-responsive\">");
            out.println("<tr>");
            out.println("<th>OrderNumber</th>");
            out.println("<th>orderDate</th>");
            out.println("<th>requireDate</th>");
            out.println("<th>shippedDate</th>");
            out.println("<th>status</th>");
            out.println("<th>commnets</th>");
            out.println("<th>customerNumer</th>");
       
            out.println("<th>Editar</th>");
            out.println("<th>Eliminar</th>");
            out.println("</tr>");
            
            
            List<entidades.Orders> c1= ordersFacade.findAll();
            for (int i = 0; i < c1.size(); i++) {
                
            
                out.println("<tr>");    
                out.println("<td>");    
                out.println(c1.get(i).getOrderNumber());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getOrderDate());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getRequiredDate());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getShippedDate());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getStatus());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getComments());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getCustomerNumber());
                out.println("</td>");
   
                out.println("<td>");
                out.println("<form action=\"addOrder.jsp\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getOrderNumber()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getOrderDate()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getRequiredDate()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getShippedDate()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getStatus()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getComments()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getCustomerNumber()+"\" />\n" +
"<input type=\"hidden\" name=\"edi\" value=\"editar\" />\n" +
"<button class=\"btn btn-primary\" type=\"submit\" value=\"Editar\" /></button>\n" +
"</form>");
                out.println("</td>");
                
                                out.println("<td>");
                out.println("<form action=\"deleteOrder\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getOrderNumber()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getOrderDate()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getRequiredDate()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getShippedDate()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getStatus()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getComments()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getCustomerNumber()+"\" />\n" +
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
