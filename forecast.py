from flask import Flask, jsonify, request
from flask_cors import CORS
from sklearn.linear_model import LinearRegression
import numpy as np

app = Flask(__name__)
CORS(app)

@app.route("/forecast", methods=["POST"])
def forecast():

    payload = request.json

    # Persiapan data untuk model
    months = np.array(range(1, len(payload) + 1)).reshape(-1, 1)
    revenues = np.array(list(payload.values()))

    # Inisialisasi dan latih model Linear Regression
    model = LinearRegression(
        positive=True
    )
    
    model.fit(months, revenues)

    # Prediksi untuk bulan ke-13
    next_month = np.array([[len(payload) + 1]])
    predicted_revenue = model.predict(next_month)

    # Mengembalikan prediksi sebagai JSON
    return jsonify({"data": payload, "predicted": predicted_revenue[0]})


if __name__ == "__main__":
    app.run(debug=True)
