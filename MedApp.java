/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package med.app.preliminary;

import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.HBox;
import javafx.scene.layout.StackPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.stage.Stage;

/**
 *
 * @author Jordan
 */
public class MedApp extends Application {
    
    @Override
    public void start(Stage primaryStage) {
        
        
        
        
        //overall Vbox for username, password, and error messages
        VBox dataBox = new VBox();
        dataBox.setPadding(new Insets(10, 0, 0, 10));
        dataBox.setSpacing(10);
        
        //username label and text field
        Label userLabel = new Label("\tUsername:");
        TextField textField = new TextField ();
        HBox userBox = new HBox();
        userBox.setSpacing(10);
        userBox.getChildren().addAll(userLabel, textField);

        //password label and text field
        final Label message = new Label(""); // error/confirm message
        HBox passBox = new HBox();
        passBox.setSpacing(10);
        passBox.setAlignment(Pos.CENTER_LEFT);
        Label pLabel = new Label("\tPassword: ");
        final PasswordField passField = new PasswordField();
        passBox.getChildren().addAll(pLabel, passField);
        
        //add all parts to overall Vbox
        dataBox.getChildren().add(userBox);
        dataBox.getChildren().addAll(passBox, message);
        
        //login button
        Button loginButton = new Button();
        loginButton.setText("Login");
        loginButton.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                System.out.println("To Do Login");
                if (!passField.getText().equals("1")) {
                    message.setText("Your password is incorrect!");
                    message.setTextFill(Color.rgb(210, 39, 30));
                } else {
                    message.setText("Your password has been confirmed");
                    message.setTextFill(Color.rgb(21, 117, 84));
                }
                passField.clear();
            }
        });
        
        //creates new pane for all objects
        StackPane root = new StackPane();
        root.getChildren().add(dataBox);
        root.getChildren().add(loginButton);
        
        Scene scene = new Scene(root, 300, 250);
        primaryStage.setTitle("Preliminary Med App");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
