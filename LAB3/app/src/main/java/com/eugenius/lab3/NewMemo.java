package com.eugenius.lab3;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class NewMemo extends AppCompatActivity {

    DBHelper mydb;
    EditText titleEdit;
    EditText bodyEdit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_new_memo);

        setGlobals();

        Button submit = (Button) findViewById(R.id.submit);
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Memo memo = new Memo();
                memo.title = titleEdit.getText().toString();
                memo.body = bodyEdit.getText().toString();
                mydb.insertMemo(memo);

                finish();
            }
        });
    }

    void setGlobals() {
        mydb = new DBHelper(this);
        titleEdit = (EditText) findViewById(R.id.editTextTitle);
        bodyEdit = (EditText) findViewById(R.id.editTextBody);
    }
}
