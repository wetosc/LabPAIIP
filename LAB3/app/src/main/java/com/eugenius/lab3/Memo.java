package com.eugenius.lab3;

import android.content.ContentValues;
import android.database.Cursor;

import java.util.List;

/**
 * Created by Eugenius on 11/22/2016.
 */

public class Memo extends Object {

    public int id;
    public String title;
    public String body;
    public String author;

    public Memo(){
        author = "myself";
    }

    public Memo(Cursor cursor){
        id = cursor.getInt(cursor.getColumnIndex("id"));
        title = cursor.getString(cursor.getColumnIndex("title"));
        body = cursor.getString(cursor.getColumnIndex("body"));
        author = cursor.getString(cursor.getColumnIndex("author"));
    }

    public ContentValues dbObject(){
        ContentValues contentValues = new ContentValues();
        contentValues.put("title", title);
        contentValues.put("body", body);
        contentValues.put("author", author);
        return contentValues;
    }
}


