package Model;

public class User {
    private int id; // L'ID de l'utilisateur
    private String email; // L'adresse e-mail de l'utilisateur
    private String password; // Le mot de passe de l'utilisateur (à des fins d'exemple, il est généralement préférable de ne pas stocker le mot de passe en clair dans l'objet User)

    // Constructeur
    public User(int id, String email, String password) {
        this.id = id;
        this.email = email;
        this.password = password;
    }

    // Getters et Setters (à adapter en fonction de vos besoins)
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    // Vous pouvez ajouter d'autres propriétés et méthodes en fonction de vos besoins
}
