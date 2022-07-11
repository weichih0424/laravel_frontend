import requests
import pandas as pd
url = "https://api.finmindtrade.com/api/v4/data"
parameter = {
    "dataset": "TaiwanStockPrice",
    "data_id": "2883",
    "start_date": "2022-01-01",
    "end_date": "2022-07-01",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRlIjoiMjAyMi0wNy0wNSAxNDoyMDo0NSIsInVzZXJfaWQiOiJFcmljX0Nob3UiLCJpcCI6IjEwMS4zLjEzOC40MyJ9.Fy5fy_wQn7SaOo2ao-cs1yb3f5tI_euCF5MjuRLFh1w", # 參考登入，獲取金鑰
}
resp = requests.get(url, params=parameter)
data = resp.json()
data = pd.DataFrame(data["data"],columns=['date','open','max','min','close','Trading_Volume'])
json = data.to_json(orient="values")
print(json)