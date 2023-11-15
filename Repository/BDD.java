package Repository;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class BDD {
	private Connection connection;
	
	public Connection Connect() {

		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			 return connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/bddcrud", "root", "");
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return connection;
		
	}
}
