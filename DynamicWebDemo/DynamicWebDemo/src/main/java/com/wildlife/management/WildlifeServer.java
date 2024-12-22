package com.wildlife.management;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import jakarta.servlet.ServletException; // For Tomcat 10
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/wildlife-data")
public class WildlifeServer extends HttpServlet {
    private static final long serialVersionUID = 1L;

    // Handling POST request when adding animal details
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Get the animal details from the request
        String animalName = request.getParameter("animalName");
        String species = request.getParameter("species");
        int age = Integer.parseInt(request.getParameter("age"));
        String habitat = request.getParameter("habitat");
        String date_added = request.getParameter("date_added");

        // Set the response type
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Insert the animal details into the database
        String sql = "INSERT INTO Animals (name, species, age, habitat, date_added) VALUES (?, ?, ?, ?, ?)";

        try (Connection conn = DatabaseConnection.getConnection();
             PreparedStatement stmt = conn.prepareStatement(sql)) {
            // Set the values from the request parameters to the prepared statement
            stmt.setString(1, animalName);
            stmt.setString(2, species);
            stmt.setInt(3, age);
            stmt.setString(4, habitat);
            stmt.setDate(5, java.sql.Date.valueOf(date_added));

            // Execute the SQL statement
            stmt.executeUpdate();

            // Response message for successful insertion
            out.println("<html><body>");
            out.println("<h2>Animal successfully added to the database!</h2>");
            out.println("</body></html>");
        } catch (SQLException e) {
            // Handle SQL exception
            out.println("<html><body>");
            out.println("<h2>Error adding animal to the database: " + e.getMessage() + "</h2>");
            out.println("</body></html>");
        } finally {
            // Clean up resources
            out.close();
        }
    }
}
