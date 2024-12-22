package com.wildlife.management;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {
    public static Connection getConnection() throws SQLException {
        try {
            // Ensure the correct JDBC driver is loaded
            Class.forName("com.mysql.cj.jdbc.Driver");
            
            // Connect to the database
            String url = "jdbc:mysql://localhost:3306/wildlifedb"; // Ensure this matches your DB info
            String username = "root";
            String password = "swethaswetha.1@"; // Replace with your password
            return DriverManager.getConnection(url, username, password);
        } catch (ClassNotFoundException | SQLException e) {
            throw new SQLException("Database connection error: " + e.getMessage());
        }
    }
}
