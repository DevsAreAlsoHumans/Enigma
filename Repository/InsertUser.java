package Repository;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class InsertUser {
	BDD connexion = new BDD();

	Connection connection = connexion.Connect();

	public void insertUser(String email, String password) {
		String query = "INSERT INTO utilisateurs (email, mot_de_passe) VALUES (?, ?)";
        try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
            preparedStatement.setString(1, email);
            preparedStatement.setString(2, password);
            preparedStatement.executeUpdate();
        } catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
