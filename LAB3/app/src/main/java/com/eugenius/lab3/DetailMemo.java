package com.eugenius.lab3;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class DetailMemo extends AppCompatActivity {

    private Memo memo;
    private DBHelper mydb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_memo);

        mydb = new DBHelper(this);

        Intent intent = getIntent();
        String id = intent.getStringExtra("id");
        memo = mydb.getMemoByID(id);

        TextView titleText = (TextView) findViewById(R.id.title);
        TextView bodyText = (TextView) findViewById(R.id.body);
        TextView authorText = (TextView) findViewById(R.id.author);
        Button deleteButton = (Button) findViewById(R.id.delete);

        titleText.setText(memo.title);
        bodyText.setText(memo.body);
        authorText.setText("©" + memo.author);

        deleteButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mydb.deleteMemoByID(String.valueOf(memo.id));
                finish();
            }
        });
    }
}
