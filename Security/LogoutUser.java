package Security;

import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPasswordField;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import Controller.UpdateUI;
import Service.IsConnected;

public class LogoutUser extends JFrame{
	
	
	public void logoutUser(JTextField emailField, JPasswordField passwordField, JTextArea userListTextArea) {
		emailField.setText("");
		passwordField.setText("");
		JOptionPane.showMessageDialog(this, "Déconnexion réussie.", "Succés", JOptionPane.INFORMATION_MESSAGE);
		new IsConnected().setConnected(false);
		
		UpdateUI updateUIInstance = new UpdateUI();
        updateUIInstance.interfaceUI(userListTextArea);
		
	}
}
