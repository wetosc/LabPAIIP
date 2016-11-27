package com.eugenius.lab3;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Eugenius on 11/21/2016.
 */
public class DBHelper extends SQLiteOpenHelper {

    public static final String DATABASE_NAME = "Main.db";
    public static final String MEMO_TABLE = "memo";

    public DBHelper(Context context) {
        super(context, DATABASE_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(
                "create table memo " +
                        "(id integer primary key, title text, body text, author text)"
        );
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS memo");
        onCreate(db);
    }

    public ArrayList<Memo> getMemos() {

        ArrayList<Memo> list = new ArrayList<Memo>();

        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res = db.rawQuery("select * from memo", null);
        res.moveToFirst();

        while (res.isAfterLast() == false) {
            list.add(new Memo(res));
            res.moveToNext();
        }
        res.close();
        return list;
    }

    public void insertMemo(Memo memo) {
        SQLiteDatabase db = this.getWritableDatabase();
        db.insert(MEMO_TABLE, null, memo.dbObject());
    }

    public Memo getMemoByID(String id) {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor res = db.rawQuery("select * from memo where id=" + id + "", null);
        res.moveToFirst();
        return new Memo(res);
    }

    public void deleteMemoByID(String id) {
        SQLiteDatabase db = this.getWritableDatabase();
        db.delete(MEMO_TABLE, "id = ?", new String[]{id});
    }
}
