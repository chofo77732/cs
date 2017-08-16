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
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import modelo.OrdersFacadeLocal;

/**
 *
 * @author MiguelAngel, Iobana Denis, Andrea
 */
public class deleteOrder extends HttpServlet {
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
        /**
     * @param a,b,c,d,e,f,g son parametros que se necesitan para el nuevo objeto de la entidad    
     * @param opc, eli son las opciones que se pueden relizar
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String a = request.getParameter("a");
        String b = request.getParameter("b");
        String c = request.getParameter("c");
        String d = request.getParameter("d");
        String e = request.getParameter("e");
        String f = request.getParameter("f");
        String g = request.getParameter("g");
        String opc = request.getParameter("opcion");
        String eli = request.getParameter("eliminar");
        String hola="no";
        
Date date = new Date();
        
        if(a!=null && !a.equals("")){
            
            int ai=Integer.parseInt(a);
           int a2=Integer.parseInt(g); 
/*Se crea el nuevo objeto de la entidad Orders, necesita parametros declarados anteriormente*/                                  
            entidades.Orders p1=new Orders(ai, date, date, e, a2);
/*se instancia el metodo remove del modelo OrdersFacadeLocal.java para eliminar*/                     
         ordersFacade.remove(p1);

        }
        
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
/*definicion del html de la pagina*/                        
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet deleteOrder</title>");            
            out.println("</head>");
            out.println("<body>");
                    out.println("<script> window.location=\"index.html\"; </script>");

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
