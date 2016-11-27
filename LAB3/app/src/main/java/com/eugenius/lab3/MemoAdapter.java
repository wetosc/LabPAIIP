package com.eugenius.lab3;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Eugenius on 11/22/2016.
 */

public class MemoAdapter extends ArrayAdapter<Memo> {

    public MemoAdapter(Context context, ArrayList<Memo> users) {
        super(context, 0, users);
    }

    @Override
    public View getView(int position, View cellView, ViewGroup parent) {

        Memo memo = getItem(position);

        if (cellView == null) {
            cellView = LayoutInflater.from(getContext()).inflate(R.layout.list_item_memo, parent, false);
        }

        TextView titleText = (TextView)  cellView.findViewById(R.id.title);
        TextView bodyText = (TextView)  cellView.findViewById(R.id.body);
        TextView authorText = (TextView)  cellView.findViewById(R.id.author);

        titleText.setText(memo.title);
        bodyText.setText(memo.body);
        authorText.setText("©" + memo.author);

        return cellView;
    }
}
