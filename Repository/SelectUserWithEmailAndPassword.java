package Repository;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import Model.User;

public class SelectUserWithEmailAndPassword {
    BDD connexion = new BDD();
    Connection connection = connexion.Connect();

    public List<User> getUser(String email, String password) {
        String query = "SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?";
        List<User> userList = new ArrayList<>();

        try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
            preparedStatement.setString(1, email);
            preparedStatement.setString(2, password);
            ResultSet resultSet = preparedStatement.executeQuery();

            while (resultSet.next()) {
                User user = new User(0, "test", "test"); // Remplacez User par votre classe utilisateur
                // Remplissez les propriétés de l'utilisateur à partir du ResultSet
                userList.add(user);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return userList;
    }
}
