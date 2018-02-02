package sample;

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
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

public class Main extends Application {

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
                    primaryStage.close();
                    mainMenu();
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

    public void mainMenu(){
        // Create a grid to put buttons on
        GridPane grid = new GridPane();
        grid.setAlignment(Pos.TOP_CENTER);
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(25, 25, 25, 25));

        // Initialize main menu pane, and add its components
        Stage mainMenuStage = new Stage();
        mainMenuStage.setTitle("Main Menu");
        mainMenuStage.setScene(new Scene(grid, 450, 450));
        mainMenuStage.show();

        // View Patients button
        Button showPatientListBtn = new Button();
        showPatientListBtn.setText("View Current Patients");
        showPatientListBtn.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                viewPatients();
                mainMenuStage.close();
            }
        });

        // Add Patients button
        Button addPatientsBtn = new Button();
        addPatientsBtn.setText("Add Patient");
        addPatientsBtn.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                addPatient();
                mainMenuStage.close();
            }
        });

        // update Database button
        Button updateDatabase = new Button();
        updateDatabase.setText("Update Database");
        updateDatabase.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                updateDB();
                mainMenuStage.close();
            }
        });

        // Put buttons on the Grid ( object, colIndex, rowIndex, colSpan, rowSpan )
        grid.add(showPatientListBtn, 0, 0, 1, 1);
        grid.add(addPatientsBtn, 0, 1, 1, 1);
        grid.add(updateDatabase, 0, 2, 1, 1);


    }

    public void viewPatients() {

        // Create a grid to put buttons on
        GridPane grid = new GridPane();
        grid.setAlignment(Pos.TOP_CENTER);
        grid.setHgap(10);
        grid.setVgap(10);
        grid.setPadding(new Insets(25, 25, 25, 25));

        // Initialize menu pane, and add its components
        Stage viewPatientsStage = new Stage();
        viewPatientsStage.setTitle("Current Patients");
        viewPatientsStage.setScene(new Scene(grid, 450, 450));
        viewPatientsStage.show();

        //username label and text field
        Label patient1 = new Label("Max Holloway");
        Label patient2 = new Label("Jose Aldo");
        Label patient3 = new Label("Frankie Edgar");
        Label patient4 = new Label("Chan Sung Jung");
        Label patient5 = new Label("Mirsad Bektic");

        // Button to return to main menu
        Button returnToMainMenu = new Button();
        returnToMainMenu.setText("Return to main menu");
        returnToMainMenu.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                mainMenu();
                viewPatientsStage.close();
            }
        });

        // Put items on the Grid ( object, colIndex, rowIndex, colSpan, rowSpan )
        grid.add(patient1, 0, 0, 1, 1);
        grid.add(patient2, 0, 1, 1, 1);
        grid.add(patient3, 0, 2, 1, 1);
        grid.add(patient4, 0, 3, 1, 1);
        grid.add(patient5, 0, 4, 1, 1);
        grid.add(returnToMainMenu, 0 , 6, 1, 1);
//        Trying to set the return to menu button at the very bottom, doesn't work...
//        returnToMainMenu.setLayoutX(200);
//        returnToMainMenu.setLayoutY(400);
//        grid.getChildren().add(returnToMainMenu);

    }

    public void addPatient() {


        // Initialize menu pane, and add its components
        Stage addPatientStage = new Stage();
        //creates new pane for all objects
        StackPane addPatientPane = new StackPane();

        // Button to return to main menu
        Button returnToMainMenu = new Button();
        returnToMainMenu.setText("Return to main menu");
        returnToMainMenu.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                mainMenu();
                addPatientStage.close();
            }
        });

        Label inProgress = new Label("in progress");

        addPatientPane.getChildren().add(inProgress);
        addPatientPane.getChildren().add(returnToMainMenu);

        addPatientStage.setTitle("Add Patient");
        addPatientStage.setScene(new Scene(addPatientPane, 450, 450));
        addPatientStage.show();
    }

    public void updateDB() {
        // Initialize menu pane, and add its components
        Stage addPatientStage = new Stage();
        //creates new pane for all objects
        StackPane addPatientPane = new StackPane();

        // Button to return to main menu
        Button returnToMainMenu = new Button();
        returnToMainMenu.setText("Return to main menu");
        returnToMainMenu.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                mainMenu();
                addPatientStage.close();
            }
        });

        Label inProgress = new Label("in progress");

        addPatientPane.getChildren().add(inProgress);
        addPatientPane.getChildren().add(returnToMainMenu);

        addPatientStage.setTitle("Update Database");
        addPatientStage.setScene(new Scene(addPatientPane, 450, 450));
        addPatientStage.show();

    }


    public static void main(String[] args) {
        launch(args);
    }
}
