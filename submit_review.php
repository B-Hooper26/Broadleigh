<?php require __DIR__ . "/inc/header.php"; ?> <!-- When the user logs in -->
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <p class="card-text"></p>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <form action="submit_review_process.php" method="POST">
                    <div class="mb-3">
                        <label for="reviewText" class="form-label">Type your review here</label>
                        <textarea class="form-control" id="reviewText" name="reviewText" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="5" style="color: #4F812C; font-size: large">5 - Excellent</option>
                            <option value="4"style="color: #809B61; font-size: large">4 - Very Good</option>
                            <option value="3"style="color: #98BA70; font-size: large">3 - Good</option>
                            <option value="2"style="color: #DC9B33; font-size: large">2 - Fair</option>
                            <option value="1"style="color: #B72B2B; font-size: large">1 - Poor</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        /* Style for the form container */
        .container {
            max-width: 600px; /* Adjust according to your design */
            margin: auto;
            font-size: x-large;
            color: black;

        }

        /* Style for the textarea and select */
        .form-control,
        .form-select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical; /* Allow vertical resizing */
        }

        /* Style for the submit button */
        .btn-primary {
            padding: 10px 20px;
            background-color: #BAD39C;
            color: black;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            
        }

        /* Style for the submit button on hover */
        .btn-primary:hover {
            background-color: #88AE5D;
            
        }

        /* Style for the card text */
        .card-text {
            font-size: 1.5rem; /* Adjust according to your design */
            font-weight: bold;
            color: black
        }

        /* Style for the form labels */
        .form-label {
            font-weight: bold;
        }

        /* Optional: Adjustments for responsiveness */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</section>
<?php require __DIR__ . "/inc/footer.php"; ?>
