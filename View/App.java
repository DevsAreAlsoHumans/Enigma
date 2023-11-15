package View;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import Controller.RegisterUser;
import Controller.UpdateUI;
import Security.LoginUser;
import Security.LogoutUser;
import Service.IsConnected;

public class App extends JFrame{
    /**
	 * 
	 */
	private static final long serialVersionUID = -1583650335330475914L;
	private JTextField emailField;
    private JPasswordField passwordField;
    private JTextArea userListTextArea;

    
    

    public App() {
        try {
        	IsConnected isConnected = new IsConnected();
			isConnected.setConnected(false);
   
        	
            
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
                    if (IsConnected.isConnected()) {
                        new LogoutUser().logoutUser(emailField, passwordField, userListTextArea);
                    } else {
                        RegisterUser register = new RegisterUser();
                    	register.registerUser( emailField,  passwordField,  userListTextArea);
                    }
                }
            });

            toggleButton.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent e) {
                    if (IsConnected.isConnected()) {
                        LogoutUser logoutUser = new LogoutUser();
						logoutUser.logoutUser(emailField, passwordField, userListTextArea);
                    } else {
                        LoginUser loginUser = new LoginUser();
						loginUser.loginUser(emailField, passwordField, userListTextArea);
                    }
                }
            });

            UpdateUI updateUIInstance = new UpdateUI();
            updateUIInstance.interfaceUI(userListTextArea);


        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
