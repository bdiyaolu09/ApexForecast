import mysql.connector
import pandas as pd
import matplotlib.pyplot as plt

# Connect to the database
cnx = mysql.connector.connect(user='bdiyaolu', password='#Mcis#22',
                              host='localhost',
                              database='bdiyaolu')

# Retrieve the data
df = pd.read_sql_query("SELECT year, turnover_rate, gross_profit_margin, net_profit_margin, operating_profit_margin FROM User_Info", cnx)

# Group the data by year and calculate the mean for each metric
df = df.groupby('year').mean()

# Plot the data
fig, axes = plt.subplots(nrows=2, ncols=2, figsize=(10, 8))
df['turnover_rate'].plot(ax=axes[0,0], kind='bar', title='Turnover Rate')
df['gross_profit_margin'].plot(ax=axes[0,1], kind='bar', title='Gross Profit Margin')
df['net_profit_margin'].plot(ax=axes[1,0], kind='bar', title='Net Profit Margin')
df['operating_profit_margin'].plot(ax=axes[1,1], kind='bar', title='Operating Profit Margin')
plt.tight_layout()

# Show the plot
plt.show()

# Close the connection
cnx.close()
