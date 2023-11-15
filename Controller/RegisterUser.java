package Controller;

import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPasswordField;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import Repository.InsertUser;
import Repository.UserExists;

public class RegisterUser extends JFrame{
	public void registerUser(JTextField emailField, JPasswordField passwordField, JTextArea userListTextArea) {
        try {
            String email = emailField.getText();
            String password = new String(passwordField.getPassword());
            UserExists exist = new UserExists();
            if (exist.userExists(email)) {
                JOptionPane.showMessageDialog(this, "Cet utilisateur existe déjà.", "Erreur", JOptionPane.ERROR_MESSAGE);
            } else {
                InsertUser insert = new InsertUser();
                insert.insertUser(email, password);
                JOptionPane.showMessageDialog(this, "Inscription réussie.", "Succés", JOptionPane.INFORMATION_MESSAGE);
                UpdateUI updateUIInstance = new UpdateUI();
                updateUIInstance.interfaceUI(userListTextArea);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
