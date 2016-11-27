package com.eugenius.lab3;

import android.content.Context;
import android.content.Intent;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    private DBHelper mydb;
    private MemoAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fabNew);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent myIntent = new Intent(MainActivity.this, NewMemo.class);
                MainActivity.this.startActivity(myIntent);
            }
        });

        mydb = new DBHelper(this);

        adapter = new MemoAdapter(this, mydb.getMemos());
        ListView listView = (ListView) findViewById(R.id.listView);
        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Memo memo = (Memo) parent.getAdapter().getItem(position);

                Intent myIntent = new Intent(MainActivity.this, DetailMemo.class);
                myIntent.putExtra("id", String.valueOf(memo.id));
                MainActivity.this.startActivity(myIntent);
            }
        });

    }


    @Override
    public void onResume() {
        super.onResume();
        adapter.clear();
        adapter.addAll(mydb.getMemos());
    }
}
