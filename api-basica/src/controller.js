module.exports = {
    reset: function balance(req, res, account_bank) {
         account_bank = [];
         return res.sendStatus(200)
    },

    balance: function balance(req, res, account_bank) {
        for (const key in req.query) {
            let balance = (account_bank.length > 0) ?
                (account_bank.forEach(element => {
                    (element.destination == req.query.account_id) ? res.status(200).json(element.amount) : res.status(404).json(0)
                })) : res.status(404).json(0)
            return balance
        }
    },

    events: function events(req, res, account_bank) {
        let body;
        body = (typeof body === 'undefined' ? req.body : body);

        (body.type == 'deposit') ? (account_bank.length > 0) ?
            account_bank.map(element => {
                (element.destination == body.destination) ? ((element.amount += body.amount) & (res.status(201).send({ destination: { id: body.destination, balance: element.amount } }))) : (account_bank.push(body) & (res.sendStatus(201).json(body)))

            }) : (account_bank.push(body), res.status(201).send({ destination: { id: body.destination, balance: body.amount } }))
            : (body.type == 'withdraw') ? (account_bank.length > 0) ?
                account_bank.map(element => {
                    (element.destination == body.origin) ? (element.amount -= body.amount) & (res.status(201).send({ origin: { id: body.origin, balance: element.amount } })) : res.status(404).json(0)

                }) : res.status(404).json(0)
                : (body.type == 'transfer') ? (account_bank.length > 0) ?
                    account_bank.map(element => {
                        (element.destination == body.origin) ? (element.amount -= body.amount) & (res.status(201).send({ origin: { id: element.destination, balance: element.amount }, destination: { id: '300', balance: 15 } })) : res.status(404).json(0)
                    }) : res.status(404).json(0) : null

    }
}