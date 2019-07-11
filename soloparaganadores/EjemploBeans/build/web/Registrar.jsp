<%-- 
    Document   : Registrar
    Created on : 03/07/2019, 04:03:50 AM
    Author     :
                ●	Medina López Jahir
                ●	Rodríguez Lujan Carlos
                ●	Román Cruzado Juan
                ●	Salinas Grados Jhosep
                ●	Zavaleta Davila Andersson

--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            String userin="", rolin="", nombrein="", jefein="", contrasein="";
            if(request.getParameter("user")!=null){
                userin=request.getParameter("user");
            }
            if(request.getParameter("rol")!=null){
                rolin=request.getParameter("rol");
            }
            if(request.getParameter("nombre")!=null){
                nombrein=request.getParameter("nombre");
            }
            if(request.getParameter("jefe")!=null){
                jefein=request.getParameter("jefe");
            }
            if(request.getParameter("contrase")!=null){
                contrasein=request.getParameter("contrase");
            }
        %>
        <jsp:useBean id="sesionActual" class="Beans.Sesion" scope="session"/>
        <jsp:setProperty name="sesionActual" property="user" value="<%=userin%>"/>
        <jsp:setProperty name="sesionActual" property="rol" value="<%=rolin%>"/>
        <jsp:setProperty name="sesionActual" property="nombre" value="<%=nombrein%>"/>
        <jsp:setProperty name="sesionActual" property="jefe" value="<%=jefein%>"/>
        <jsp:setProperty name="sesionActual" property="contrase" value="<%=contrasein%>"/>
        <center>
            <h2>Bienvenido</h2>
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><jsp:getProperty name="sesionActual" property="user"/></td>
                </tr>
                <tr>
                    <td>Rol: </td>
                    <td><jsp:getProperty name="sesionActual" property="rol"/></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><jsp:getProperty name="sesionActual" property="nombre"/></td>
                </tr>
                <tr>
                    <td>Jefe: </td>
                    <td><jsp:getProperty name="sesionActual" property="jefe"/></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><jsp:getProperty name="sesionActual" property="contrase"/></td>
                </tr>
            </table><br><br>
                <a href="index.html">Registrar Otro</a>
        </center>        
    </body>
</html>
