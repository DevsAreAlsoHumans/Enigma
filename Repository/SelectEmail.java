package Repository;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class SelectEmail {
	BDD connexion = new BDD();

	Connection connection = connexion.Connect();

	public ResultSet getEmail() {
		String query = "SELECT email FROM utilisateurs";
		try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
			 ResultSet resultSet = null;
			try {
				resultSet = preparedStatement.executeQuery();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			return resultSet;
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		return null;
	}
}
