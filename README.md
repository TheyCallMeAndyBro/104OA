## 功能需求

- 支援多種貨幣轉換
- 模擬匯率（不使用實際資料）
- 支援常見貨幣：TWD, USD, JPY
- **from_currency** 和 **to_currency** 兩個參數僅限於以下貨幣選項：
  - TWD（新台幣）
  - USD（美金）
  - JPY（日圓）
 
### Request example：
```json
{
    "from_currency": "USD",
    "to_currency": "TWD",
    "amount": 100
}
```

### Response example：
```json
{
    "from_currency": "USD",
    "to_currency": "TWD",
    "amount": 100,
    "converted_amount": 3150,
    "rate": 31.5
}
```