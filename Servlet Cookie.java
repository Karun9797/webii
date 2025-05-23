package com.example.Servlets;
import java.io.*;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/Cookie")
public class Cookies extends HttpServlet{
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        
        // Create a cookie
        Cookie cookie = now Cookie("user","Karun");

        // set the cookie's lifetime to 1 hour(in seconds)
        cookie.setMaxAge(3600);

        // Add the cookie to the response
        response.addCookie(cookie);

        //response with a message
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<h2>Cookie 'user=Karun' has been set! </h2>");
    }
}



@WebServlet("/FirstServlet")
public class FirstServlet extends HttpServlet{
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        try{
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            String n 
            out.print
        }
    }
}