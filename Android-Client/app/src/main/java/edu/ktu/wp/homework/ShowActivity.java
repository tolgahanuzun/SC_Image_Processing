package edu.ktu.wp.homework;

import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

public class ShowActivity extends AppCompatActivity implements View.OnClickListener, LoadImage.Listener {

    private ImageView mImageView;
    private Button mBtLoadImage;

    public static final String IMAGE_URL = "http://domain.com/uploads/IMG.jpg";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_show);

        mImageView = (ImageView) findViewById(R.id.showImage);
        mBtLoadImage = (Button) findViewById(R.id.btn_load_image);
        mBtLoadImage.setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()) {

            case R.id.btn_load_image:
                new LoadImage(this).execute(IMAGE_URL);
                break;
        }
    }

    @Override
    public void onImageLoaded(Bitmap bitmap) {

        mImageView.setImageBitmap(bitmap);
    }

    @Override
    public void onError() {
        Toast.makeText(this, "Error Loading Image !", Toast.LENGTH_SHORT).show();
    }
}