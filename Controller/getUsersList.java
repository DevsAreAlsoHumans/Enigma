package Controller;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import Repository.BDD;

public class getUsersList {
    BDD connexion = new BDD();
    Connection connection = connexion.Connect();

    public List<String> getUsersList() {
        List<String> userList = new ArrayList<>();

        String query = "SELECT email FROM utilisateurs";
        try (PreparedStatement preparedStatement = connection.prepareStatement(query);
             ResultSet resultSet = preparedStatement.executeQuery()) {

            while (resultSet.next()) {
                userList.add(resultSet.getString("email"));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return userList;
    }
}
