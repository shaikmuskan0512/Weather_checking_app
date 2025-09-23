async function searchWeather() {
  const city = document.getElementById("cityInput").value;

  const weatherResponse = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=YOUR_API_KEY`);
  const weatherData = await weatherResponse.json();

  document.getElementById("result").innerHTML = `
    <h3>${weatherData.name}</h3>
    <p>Temperature: ${weatherData.main.temp}°C</p>
    <p>Humidity: ${weatherData.main.humidity}%</p>
  `;

  // Save city to PHP server
  await fetch("http://localhost:8000/save_city.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ name: city })
  });
}
