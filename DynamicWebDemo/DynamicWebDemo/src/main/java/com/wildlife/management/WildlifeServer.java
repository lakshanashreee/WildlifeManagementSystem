package com.wildlife.management;

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException; // For Tomcat 10
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/wildlife-data")
public class WildlifeServer extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Get the animal name from the request
        String animalName = request.getParameter("animal");

        // Set the response type
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Display the submitted animal name
        out.println("<html><body>");
        out.println("<h2>You entered: " + animalName + "</h2>");
        out.println("</body></html>");
    }
}
