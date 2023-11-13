/**
 * 
 */
package service;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class LoginApp extends JFrame {

    private JTextField emailField;
    private JPasswordField passwordField;
    private JTextArea userListTextArea;

    private Connection connection;
    private boolean isConnected = false;

    public LoginApp() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/bddcrud", "root", "");

            
            setTitle("Application Utilisateur");
            setSize(400, 300);
            setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

            JPanel panel = new JPanel();
            panel.setLayout(new GridLayout(4, 2));

            JLabel emailLabel = new JLabel("Email:");
            emailField = new JTextField();
            JLabel passwordLabel = new JLabel("Mot de passe:");
            passwordField = new JPasswordField();

            JButton actionButton = new JButton("S'inscrire");
            JButton toggleButton = new JButton("Se connecter/Se déconnecter");

            userListTextArea = new JTextArea();
            userListTextArea.setEditable(false);

            panel.add(emailLabel);
            panel.add(emailField);
            panel.add(passwordLabel);
            panel.add(passwordField);
            panel.add(actionButton);
            panel.add(toggleButton);

            add(panel, BorderLayout.NORTH);
            add(new JScrollPane(userListTextArea), BorderLayout.CENTER);

            actionButton.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent e) {
                    if (isConnected) {
                        logoutUser();
                    } else {
                        registerUser();
                    }
                }
            });

            toggleButton.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent e) {
                    if (isConnected) {
                        logoutUser();
                    } else {
                        loginUser();
                    }
                }
            });

            updateUI();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void registerUser() {
        try {
            String email = emailField.getText();
            String password = new String(passwordField.getPassword());

            if (userExists(email)) {
                JOptionPane.showMessageDialog(this, "Cet utilisateur existe déjà.", "Erreur", JOptionPane.ERROR_MESSAGE);
            } else {
                String query = "INSERT INTO utilisateurs (email, mot_de_passe) VALUES (?, ?)";
                try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
                    preparedStatement.setString(1, email);
                    preparedStatement.setString(2, password);
                    preparedStatement.executeUpdate();
                }

                JOptionPane.showMessageDialog(this, "Inscription réussie.", "Succès", JOptionPane.INFORMATION_MESSAGE);
                updateUI();
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private boolean userExists(String email) throws SQLException {
        String query = "SELECT * FROM utilisateurs WHERE email = ?";
        try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
            preparedStatement.setString(1, email);
            ResultSet resultSet = preparedStatement.executeQuery();
            return resultSet.next();
        }
    }

    private void loginUser() {
        String email = emailField.getText();
        String password = new String(passwordField.getPassword());

        try {
            String query = "SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?";
            try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
                preparedStatement.setString(1, email);
                preparedStatement.setString(2, password);
                ResultSet resultSet = preparedStatement.executeQuery();

                if (resultSet.next()) {
                    JOptionPane.showMessageDialog(this, "Connexion réussie.", "Succès", JOptionPane.INFORMATION_MESSAGE);
                    isConnected = true;
                    updateUI();
                } else {
                    JOptionPane.showMessageDialog(this, "Identifiants incorrects.", "Erreur", JOptionPane.ERROR_MESSAGE);
                }
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private void logoutUser() {
        emailField.setText("");
        passwordField.setText("");
        JOptionPane.showMessageDialog(this, "Déconnexion réussie.", "Succès", JOptionPane.INFORMATION_MESSAGE);

        isConnected = false;
        updateUI();
    }

    private void updateUI() {
        userListTextArea.setText(isConnected ? getUsersList() : "");
    }

    private String getUsersList() {
        try {
            StringBuilder userList = new StringBuilder();
            String query = "SELECT email FROM utilisateurs";
            try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
                ResultSet resultSet = preparedStatement.executeQuery();
                while (resultSet.next()) {
                    userList.append(resultSet.getString("email")).append("\n");
                }
            }
            return userList.toString();

        } catch (SQLException e) {
            e.printStackTrace();
            return "";
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run() {
                new LoginApp().setVisible(true);
            }
        });
    }
}








