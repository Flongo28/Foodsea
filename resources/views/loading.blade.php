<!DOCTYPE html>
<html>
<head>
    <title>Loading Screen</title>
    
    <style>       
        /* Loading screen */
        .loader {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            display: inline-block;
            width: 80px;
            height: 80px;
            border: 8px solid #f3f3f3;
            border-top: 8px solid #296b34;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader">
        <div class="text-center">
            <div class="loading-spinner"></div>
            <h4>Loading...</h4>
        </div>
    </div>
</body>
</html>
