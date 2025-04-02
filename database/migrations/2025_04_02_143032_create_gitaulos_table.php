<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGitaUlosTable extends Migration
{
    public function up()
    {
        // Tabel Admin
        Schema::create('admins', function (Blueprint $table) {
            $table->id('AdminID');
            $table->string('AdminName', 255);
            $table->string('Email', 255)->unique();
            $table->string('Password', 100);
            $table->timestamps();
        });

        // Tabel Customer
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CustomerID');
            $table->string('CustomerName', 255);
            $table->string('Email', 255)->unique();
            $table->string('Password', 255);
            $table->text('Address');
            $table->date('Birthday');
            $table->timestamps();
        });

        // Tabel Product
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('ProductName', 255);
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->string('Category', 255);
            $table->text('Description');
            $table->string('Images', 255);
            $table->timestamps();
        });

        // Tabel Carts
        Schema::create('carts', function (Blueprint $table) {
            $table->id('CartsID');
            $table->unsignedBigInteger('ProductID'); // Gunakan unsignedBigInteger untuk kolom relasi
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->string('NamaProduct', 255);
            $table->integer('Quantity');
            $table->timestamps();
        });

        // Tabel Orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('ProductID'); // Gunakan unsignedBigInteger untuk kolom relasi
            $table->unsignedBigInteger('CustomerID'); // Gunakan unsignedBigInteger untuk kolom relasi
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('cascade');
            $table->string('CustomerName', 255);
            $table->string('ProductName', 255);
            $table->integer('Quantity');
            $table->text('Request')->nullable();
            $table->text('Address');
            $table->timestamps();
        });

        // Tabel OrderStatus
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id('OrderStatusID');
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('CustomerID');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('cascade');
            $table->string('CustomerName', 255);
            $table->string('ProductName', 255);
            $table->integer('Quantity');
            $table->text('Request')->nullable();
            $table->text('Address');
            $table->enum('OrderStatus', ['Pending', 'Processing', 'Completed', 'Cancelled']);
            $table->timestamps();
        });

        // Tabel Review
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->string('ReviewerName', 255);
            $table->integer('Rating');
            $table->string('Picture', 255);
            $table->text('Coment');
            $table->timestamps();
        });

        // Tabel HideProduct
        Schema::create('hide_products', function (Blueprint $table) {
            $table->id('HideProductID');
            $table->string('ProductName', 255);
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->string('Category', 255);
            $table->text('Description');
            $table->string('Images', 255);
            $table->timestamps();
        });

        // Tabel HideReview
        Schema::create('hide_reviews', function (Blueprint $table) {
            $table->id('HideReviewID');
            $table->string('ReviewerName', 255);
            $table->integer('Rating');
            $table->string('Picture', 255);
            $table->text('Coment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('hide_products');
        Schema::dropIfExists('hide_reviews');
    }
}

