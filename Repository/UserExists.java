package Repository;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class UserExists {
	BDD connexion = new BDD();

	Connection connection = connexion.Connect();

	   public boolean userExists(String email) throws SQLException {
	       
		   String query = "SELECT * FROM utilisateurs WHERE email = ?";
	        try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
	            preparedStatement.setString(1, email);
	            ResultSet resultSet = preparedStatement.executeQuery();
	            if(resultSet.next()) {
	            	return true;
	            } else {
	            	return false;
	            }
	        }
	    }
}
