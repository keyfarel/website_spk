# EDAS Modular Web App

This is a web-based implementation of the **Evaluation based on Distance from Average Solution (EDAS)** method. The app is designed modularly with a step-by-step interface, making it easier to understand each part of the decision-making process.

## 🧮 Features

- 8-step modular EDAS calculation
- Clear table display for each step
- Responsive UI with separate CSS files
- Easy navigation between steps
- Supports decimal weights with high precision

## 📁 Project Structure

```
/
├── css/
│   ├── langkah_1.css
│   ├── langkah_2.css
│   └── ...
├── steps/
│   ├── langkah_1.php
│   ├── langkah_2.php
│   └── ...
├── data.php
├── index.php
└── README.md
```

## 🚀 How to Run

1. **Clone this repository**
   ```bash
   https://github.com/keyfarel/website_spk.git
   ```

2. **Move the folder to your local server directory**
   - If you're using **Laragon**, move it to:  
     `C:\laragon\www`

3. **Start your server**
   - Open **Laragon**
   - Click **Start All**

4. **Access via browser**
   - Go to:  
     [http://localhost/website_spk/edas_web/index.php](http://localhost/website_spk/edas_web/index.php)

## ⚙️ Requirements

- PHP 7.4 or higher
- Local server (e.g. Laragon, XAMPP, WAMP)
- Web browser (recommended: Firefox or Chrome)

## 📌 Notes

- The method uses 20 alternatives and 8 criteria
- Weights can be configured in `data.php` using high-precision decimals
- Each step is isolated for clarity and easier debugging

## 📄 License

This project is open source and free to use under the [MIT License](LICENSE).
