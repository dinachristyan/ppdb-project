const express = require('express');
const bodyParser = require('body-parser');
const sequelize = require('./config/database');
const pendaftaranRoutes = require('./routes/pendaftaranRoute');
const siswasRoutes = require('./routes/siswasRoute');
const cors = require('cors')

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors())
app.use(bodyParser.json());
app.use('/pendaftaran', pendaftaranRoutes);
app.use('/siswas', siswasRoutes);

sequelize.authenticate()
  .then(() => {
    console.log('Connection to database has been established successfully.');
    return sequelize.sync();
  })
  .then(() => {
    app.listen(PORT, () => {
      console.log(`Server is running on port ${PORT}`);
    });
  })
  .catch(err => {
    console.error('Unable to connect to the database:', err);
  });
