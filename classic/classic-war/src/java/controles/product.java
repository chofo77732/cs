/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controles;

import entidades.Products;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import modelo.ProductsFacadeLocal;

/**
 *
 * @author MiguelAngel
 */
public class product extends HttpServlet {
    @EJB
    private ProductsFacadeLocal productsFacade;

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
        String h = request.getParameter("8");
        String j = request.getParameter("9");
        String opc = request.getParameter("opcion");
        String eli = request.getParameter("eliminar");
        String hola="no";
        

        
        if(a!=null && !a.equals("")){
            
            double hh=Double.valueOf(h).doubleValue();
            double ii=Double.valueOf(j).doubleValue();
            short s = Short.parseShort(g);
            
            entidades.Products p1=new Products(a,b,c,d,e,f,s,hh,ii);
        
            if(opc.equals("editar")){
//                customersFacade.remove(ec); 
                productsFacade.edit(p1);
                response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
        out.println("<script> window.location=\"index.html\"; </script>");
        }
            }else{
               productsFacade.create(p1);
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
            
            
            out.println("<h1>Products</h1>");
//            entidades.Customers ec=new Customers(99, "hola", "adios", "1", "3", "2", "4", "4");
//            customersFacade.create(ec);

//            out.println(eli);
            out.println("<a href=\"addProduct.jsp\">Agregar</a>");

            out.println("<table class=\"table table-bordered table-responsive\">");
            out.println("<tr>");
            out.println("<th>ProductCode</th>");
            out.println("<th>ProductName</th>");
            out.println("<th>ProductLine</th>");
            out.println("<th>ProductScale</th>");
            out.println("<th>ProductVendor</th>");
            out.println("<th>ProductDescription</th>");
            out.println("<th>quantityInStock</th>");
            out.println("<th>buyPrice</th>");
            out.println("<th>MSRP</th>");
            out.println("<th>Editar</th>");
            out.println("<th>Eliminar</th>");
            out.println("</tr>");
            
            
            List<entidades.Products> c1= productsFacade.findAll();
            for (int i = 0; i < c1.size(); i++) {
                
            
                out.println("<tr>");    
                out.println("<td>");    
                out.println(c1.get(i).getProductCode());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getProductName());
                out.println("</td>");      
                out.println("<td>");    
                out.println(c1.get(i).getProductLine());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getProductScale());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getProductVendor());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getProductDescription());
                out.println("</td>");   
                out.println("<td>");    
                out.println(c1.get(i).getQuantityInStock());
                out.println("</td>");
                out.println("<td>");    
                out.println(c1.get(i).getBuyPrice());
                out.println("</td>");     
                out.println("<td>");    
                out.println(c1.get(i).getMsrp());
                out.println("</td>");  
                
                out.println("<td>");
                out.println("<form action=\"addProduct.jsp\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getProductCode()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getProductName()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getProductLine()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getProductScale()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getProductVendor()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getProductDescription()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getQuantityInStock()+"\" />\n" +
"<input type=\"hidden\" name=\"h\" value=\""+c1.get(i).getBuyPrice()+"\" />\n" +
"<input type=\"hidden\" name=\"j\" value=\""+c1.get(i).getMsrp()+"\" />\n" +
"<input type=\"hidden\" name=\"edi\" value=\"editar\" />\n" +
"<button class=\"btn btn-primary\" type=\"submit\" value=\"Editar\" /></button>\n" +
"</form>");
                out.println("</td>");
                
                
                out.println("<td>");
                out.println("<form action=\"deleteProduct\">\n" +
"<input type=\"hidden\" name=\"a\" value=\""+c1.get(i).getProductCode()+"\" />\n" +
"<input type=\"hidden\" name=\"b\" value=\""+c1.get(i).getProductName()+"\" />\n" +
"<input type=\"hidden\" name=\"c\" value=\""+c1.get(i).getProductLine()+"\" />\n" +
"<input type=\"hidden\" name=\"d\" value=\""+c1.get(i).getProductScale()+"\" />\n" +
"<input type=\"hidden\" name=\"e\" value=\""+c1.get(i).getProductVendor()+"\" />\n" +
"<input type=\"hidden\" name=\"f\" value=\""+c1.get(i).getProductDescription()+"\" />\n" +
"<input type=\"hidden\" name=\"g\" value=\""+c1.get(i).getQuantityInStock()+"\" />\n" +
"<input type=\"hidden\" name=\"h\" value=\""+c1.get(i).getBuyPrice()+"\" />\n" +
"<input type=\"hidden\" name=\"j\" value=\""+c1.get(i).getMsrp()+"\" />\n" +
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
