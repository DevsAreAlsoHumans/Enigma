package Controller;

import java.util.ArrayList;
import java.util.List;

import javax.swing.JFrame;
import javax.swing.JTextArea;

import Service.IsConnected;

public class UpdateUI extends JFrame {
    

    public void interfaceUI(JTextArea userListTextArea) {
        List<String> userList = new IsConnected().isConnected() ? new getUsersList().getUsersList() : new ArrayList<>();
        String userListText = String.join("\n", userList);
        userListTextArea.setText(userListText);
    }

}
